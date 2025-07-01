let assentosSelecionados = [];
let assentosReservados = [];

function exibeAssentos() {
    for (let i = 1; i <= 32; i++) {
        const assento = document.createElement('div');
        assento.className = 'assento';
        assento.id = `assento-${i}`;
        assento.innerText = i;
        assento.onclick = () => selecionarAssento(i);

        document.querySelector('.assentos').appendChild(assento);
    }
}

function selecionarAssento(numero) {
    const index = assentosSelecionados.indexOf(numero);

    if (index !== -1) {
        assentosSelecionados.splice(index, 1);
        document.getElementById(`assento-${numero}`).classList.remove('selecionado');
    } else {
        assentosSelecionados.push(numero);
        document.getElementById(`assento-${numero}`).classList.add('selecionado');
    }
}

function reservarAssentos() {
    const assentosJaReservados = assentosSelecionados.filter(numero => assentosReservados.includes(numero))

    console.log('assentosJaReservados', assentosJaReservados);
    console.log('assentosSelecionados', assentosSelecionados);
    console.log('assentosReservados', assentosReservados);

    if (assentosJaReservados.length > 0) {
        document.getElementById('mensagem').innerText = `Existem assentos selecionados que já estão reservados: ${assentosJaReservados.join(', ')}. Por favor, deselecione-os antes de tentar reservar novamente.`;
        return;
    }

    assentosReservados.push(...assentosSelecionados);
    
    assentosReservados.forEach(numero => {
        const assento = document.getElementById(`assento-${numero}`);
        assento.classList.add('reservado');
        assento.classList.remove('selecionado');
    });

    document.getElementById('mensagem').innerText = `Os assentos ${assentosSelecionados.join(', ')} foram reservados com sucesso!`;

    assentosSelecionados = [];
}

exibeAssentos();