{{-- This file is deprecated. Redirecting to new admin dashboard --}}
<script>
    window.location.href = "{{ route('admin.dashboard') }}";
</script>

{{-- Fallback if JavaScript is disabled --}}
<meta http-equiv="refresh" content="0;url={{ route('admin.dashboard') }}">

<p>If you are not redirected automatically, <a href="{{ route('admin.dashboard') }}">click here</a>.</p> 