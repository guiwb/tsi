document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('[data-epoch]').forEach(element => {
        const epochMillis = parseInt(element.getAttribute('data-epoch'));
        if (epochMillis) {
            const date = new Date(epochMillis);
            element.textContent = date.toLocaleString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            }).replace(',', ' às');
        }
    });
});