<style>
    .notification-container {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        max-width: 400px;
        width: 100%;
    }

    .notification {
        position: relative;
        padding: 16px;
        padding-right: 40px;
        margin-bottom: 12px;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: flex-start;
    }

    .notification-close {
        position: absolute;
        top: 12px;
        right: 12px;
        background: none;
        border: none;
        cursor: pointer;
        color: inherit;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .notification-close:hover {
        opacity: 1;
    }

    @media (max-width: 640px) {
        .notification-container {
            max-width: calc(100% - 40px);
            left: 20px;
            right: 20px;
        }
    }
</style>

<div class="notification-container space-y-3">
    @if ($errors->any())
        <div class="notification bg-red-50 text-red-700 border-l-4 border-red-500 flex items-start justify-between p-4 rounded">
            <div class="flex gap-2">
                <!-- FA: Exclamation Circle -->
                <i class="fas fa-exclamation-circle text-red-600 mt-0.5"></i>
                <div>
                    <p class="font-medium">Terjadi kesalahan!</p>
                    <ul class="mt-1 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button class="notification-close text-red-600 hover:text-red-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if (session('success'))
        <div class="notification bg-green-50 text-green-700 border-l-4 border-green-500 flex items-start justify-between p-4 rounded">
            <div class="flex gap-2">
                <!-- FA: Check Circle -->
                <i class="fas fa-check-circle text-green-600 mt-0.5"></i>
                <div>
                    <p class="font-medium">Sukses!</p>
                    <p class="mt-1 text-sm">{{ session('success') }}</p>
                </div>
            </div>
            <button class="notification-close text-green-600 hover:text-green-800">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif
</div>

<script>
    document.querySelectorAll('.notification').forEach(notification => {
        const closeButton = notification.querySelector('.notification-close');
        if (closeButton) {
            closeButton.addEventListener('click', function() {
                notification.remove();
            });
        }
        setTimeout(() => {
            notification.style.transition = 'opacity 0.5s ease';
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 500);
        }, 3000);
    });
</script>
