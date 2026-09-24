<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        // Get notifications for the current admin user
        $notifications = $this->getNotifications();
        
        return response()->json([
            'notifications' => $notifications,
            'unread_count' => collect($notifications)->where('read', false)->count()
        ]);
    }

    public function markAsRead(Request $request)
    {
        $request->validate([
            'notification_id' => 'required|string'
        ]);

        // In a real application, you would mark the notification as read in the database
        // For now, we'll just return success
        
        return response()->json([
            'success' => true,
            'message' => 'Notification marked as read'
        ]);
    }

    public function markAllAsRead()
    {
        // In a real application, you would mark all notifications as read in the database
        // For now, we'll just return success
        
        return response()->json([
            'success' => true,
            'message' => 'All notifications marked as read'
        ]);
    }

    public function destroy($notificationId)
    {
        // In a real application, you would delete the notification from the database
        // For now, we'll just return success
        
        return response()->json([
            'success' => true,
            'message' => 'Notification deleted'
        ]);
    }

    private function getNotifications()
    {
        // In a real application, you would fetch notifications from the database
        // For now, we'll return sample notifications
        
        return [
            [
                'id' => 1,
                'type' => 'user_registration',
                'title' => 'New User Registered',
                'message' => 'John Doe has registered on the site',
                'icon' => 'fas fa-user-plus',
                'icon_color' => 'text-success',
                'read' => false,
                'created_at' => now()->subMinutes(2)->diffForHumans(),
                'url' => route('admin.users.index')
            ],
            [
                'id' => 2,
                'type' => 'new_order',
                'title' => 'New Order Received',
                'message' => 'Order #12345 has been placed',
                'icon' => 'fas fa-shopping-cart',
                'icon_color' => 'text-primary',
                'read' => false,
                'created_at' => now()->subMinutes(5)->diffForHumans(),
                'url' => route('admin.orders.index')
            ],
            [
                'id' => 3,
                'type' => 'low_stock',
                'title' => 'Low Stock Alert',
                'message' => 'Product "T-Shirt" is running low',
                'icon' => 'fas fa-exclamation-triangle',
                'icon_color' => 'text-warning',
                'read' => true,
                'created_at' => now()->subHour()->diffForHumans(),
                'url' => route('admin.products.index')
            ],
            [
                'id' => 4,
                'type' => 'system_update',
                'title' => 'System Update Available',
                'message' => 'New system update is ready for installation',
                'icon' => 'fas fa-download',
                'icon_color' => 'text-info',
                'read' => false,
                'created_at' => now()->subHours(2)->diffForHumans(),
                'url' => route('admin.settings.index')
            ],
        ];
    }
}
