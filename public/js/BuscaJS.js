const input = document.getElementById('filtro-nome');
const trs = [...document.querySelectorAll('#Tableprodutos tbody tr')];

input.addEventListener('input', () => {
  const search = input.value.toLowerCase();
  trs.forEach(el => {
    const matches = el.textContent.toLowerCase().includes(search);
    el.style.display = matches ? '' : 'none';
  });
});