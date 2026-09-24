@props(['filters' => []])

<div class="quick-filters mb-3">
    <div class="d-flex flex-wrap gap-2">
        <span class="text-muted small me-2">
            <i class="fas fa-bolt me-1"></i>Quick Filters:
        </span>
        
        @foreach($filters as $filter)
            <a href="{{ request()->fullUrlWithQuery([$filter['param'] => $filter['value']]) }}" 
               class="btn btn-sm {{ request($filter['param']) == $filter['value'] ? 'btn-primary' : 'btn-outline-primary' }}">
                <i class="{{ $filter['icon'] ?? 'fas fa-filter' }} me-1"></i>
                {{ $filter['label'] }}
                @if(request($filter['param']) == $filter['value'])
                    <span class="badge bg-light text-primary ms-1">{{ $filter['count'] ?? '' }}</span>
                @endif
            </a>
        @endforeach
        
        @if(request()->hasAny(array_column($filters, 'param')))
            <a href="{{ request()->url() }}" class="btn btn-sm btn-outline-secondary">
                <i class="fas fa-times me-1"></i>Clear
            </a>
        @endif
    </div>
</div>

@push('styles')
<style>
    .quick-filters .btn {
        border-radius: 6px;
        font-size: 0.75rem;
        padding: 0.375rem 0.75rem;
        transition: all 0.3s ease;
    }
    
    .quick-filters .btn:hover {
        transform: translateY(-1px);
    }
    
    .quick-filters .badge {
        font-size: 0.65rem;
        padding: 0.125rem 0.375rem;
    }
</style>
@endpush
