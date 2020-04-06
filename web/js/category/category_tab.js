function show_tab_main(elem) {
    let tab_id, tab, all_tab;
        document.querySelectorAll('.main-tab__link').forEach(function(el) {
   el.classList.remove('main-tab--active');
});
    document.querySelectorAll('.main-tab__item').forEach(function(el) {
   el.style.display = 'none';
});
    elem.classList.add("main-tab--active");
    tab_id = elem.getAttribute('href');
    tab_id = tab_id.replace('#', '');
    tab = document.getElementById(tab_id);
    tab.style.display = 'block';
}

function show_tab_sub(elem) {
    let tab_id, tab, all_tab;
        document.querySelectorAll('.sub-tab__link').forEach(function(el) {
   el.classList.remove('sub-tab--active');
});
    document.querySelectorAll('.sub-tab__item').forEach(function(el) {
   el.style.display = 'none';
});
    elem.classList.add("sub-tab--active");
    tab_id = elem.getAttribute('href');
    tab_id = tab_id.replace('#', '');
    tab = document.getElementById(tab_id);
    tab.style.display = 'block';
}