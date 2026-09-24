<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class SettingsController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware to all methods
        $this->middleware('auth');
        
        // Apply admin role check middleware
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || auth()->user()->role !== 'admin') {
                return redirect()->route('home')->with('error', 'You are not authorized to access this area.');
            }
            return $next($request);
        });
    }

    /**
     * Display the settings page.
     */
    public function index()
    {
        $settings = $this->getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Update general settings.
     */
    public function updateGeneral(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_email' => 'required|email|max:255',
            'site_phone' => 'nullable|string|max:20',
            'site_address' => 'nullable|string|max:500',
            'currency' => 'required|string|max:10',
            'timezone' => 'required|string|max:50',
        ]);

        $this->updateSettings('general', $validated);

        return redirect()->back()->with('success', 'General settings updated successfully!');
    }

    /**
     * Update email settings.
     */
    public function updateEmail(Request $request)
    {
        $validated = $request->validate([
            'mail_driver' => 'required|string|max:50',
            'mail_host' => 'required|string|max:255',
            'mail_port' => 'required|integer|min:1|max:65535',
            'mail_username' => 'nullable|string|max:255',
            'mail_password' => 'nullable|string|max:255',
            'mail_encryption' => 'nullable|string|max:20',
            'mail_from_address' => 'required|email|max:255',
            'mail_from_name' => 'required|string|max:255',
        ]);

        $this->updateSettings('email', $validated);

        return redirect()->back()->with('success', 'Email settings updated successfully!');
    }

    /**
     * Update payment settings.
     */
    public function updatePayment(Request $request)
    {
        $validated = $request->validate([
            'stripe_public_key' => 'nullable|string|max:255',
            'stripe_secret_key' => 'nullable|string|max:255',
            'paypal_client_id' => 'nullable|string|max:255',
            'paypal_client_secret' => 'nullable|string|max:255',
            'default_payment_method' => 'required|string|in:stripe,paypal,cash_on_delivery',
        ]);

        $this->updateSettings('payment', $validated);

        return redirect()->back()->with('success', 'Payment settings updated successfully!');
    }

    /**
     * Update system settings.
     */
    public function updateSystem(Request $request)
    {
        $validated = $request->validate([
            'maintenance_mode' => 'nullable|in:on',
            'registration_enabled' => 'nullable|in:on',
            'email_verification_required' => 'nullable|in:on',
            'max_file_upload_size' => 'required|integer|min:1|max:100',
            'session_lifetime' => 'required|integer|min:60|max:1440',
            'password_min_length' => 'required|integer|min:6|max:20',
        ]);

        $this->updateSettings('system', $validated);

        return redirect()->back()->with('success', 'System settings updated successfully!');
    }

    /**
     * Clear application cache.
     */
    public function clearCache()
    {
        Cache::flush();
        
        return redirect()->back()->with('success', 'Application cache cleared successfully!');
    }

    /**
     * Get all settings from storage.
     */
    private function getSettings()
    {
        $defaultSettings = [
            'general' => [
                'site_name' => 'Male Fashion Store',
                'site_description' => 'Your premier destination for men\'s fashion',
                'site_email' => 'admin@malefashion.com',
                'site_phone' => '+1 (555) 123-4567',
                'site_address' => '123 Fashion Street, Style City, SC 12345',
                'currency' => 'USD',
                'timezone' => 'America/New_York',
            ],
            'email' => [
                'mail_driver' => 'smtp',
                'mail_host' => 'smtp.gmail.com',
                'mail_port' => 587,
                'mail_username' => '',
                'mail_password' => '',
                'mail_encryption' => 'tls',
                'mail_from_address' => 'noreply@malefashion.com',
                'mail_from_name' => 'Male Fashion Store',
            ],
            'payment' => [
                'stripe_public_key' => '',
                'stripe_secret_key' => '',
                'paypal_client_id' => '',
                'paypal_client_secret' => '',
                'default_payment_method' => 'stripe',
            ],
            'system' => [
                'maintenance_mode' => false,
                'registration_enabled' => true,
                'email_verification_required' => false,
                'max_file_upload_size' => 5,
                'session_lifetime' => 120,
                'password_min_length' => 8,
            ],
        ];

        // Try to load from storage, fallback to defaults
        if (Storage::exists('admin_settings.json')) {
            $storedSettings = json_decode(Storage::get('admin_settings.json'), true);
            return array_merge($defaultSettings, $storedSettings);
        }

        return $defaultSettings;
    }

    /**
     * Update settings in storage.
     */
    private function updateSettings($category, $data)
    {
        $settings = $this->getSettings();
        
        // Convert checkbox values to boolean for system settings
        if ($category === 'system') {
            $data['maintenance_mode'] = isset($data['maintenance_mode']);
            $data['registration_enabled'] = isset($data['registration_enabled']);
            $data['email_verification_required'] = isset($data['email_verification_required']);
        }
        
        $settings[$category] = array_merge($settings[$category] ?? [], $data);
        
        Storage::put('admin_settings.json', json_encode($settings, JSON_PRETTY_PRINT));
    }
}
