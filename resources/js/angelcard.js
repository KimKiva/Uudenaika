export function drawAngelCard() {
    fetch('/api/angel-card')
        .then(res => res.json())
        .then(data => {
            document.getElementById('angel-image').src = data.image;
            document.getElementById('angel-message').textContent = data.message;
            document.getElementById('angelcard').classList.remove('hidden');
        });
}

export function closeAngelCard() {
    document.getElementById('angelcard').classList.add('hidden');
}
