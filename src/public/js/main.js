const target = document.getElementById("menu");
target.addEventListener("click", () => {
    target.classList.toggle("open");
    const nav = document.getElementById("nav");
    nav.classList.toggle("in");
});
