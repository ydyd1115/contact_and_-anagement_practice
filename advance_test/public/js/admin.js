const target = document.getElementById("search_menu");
target.addEventListener('click', () => {
  target.classList.toggle('open');
  const search = document.getElementById("search");
  search.classList.toggle('in');
});