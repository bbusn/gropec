let nav = ['home', 'add', 'group', 'user'];
const height = 40;

nav.forEach((item) => document.getElementById(item).classList.remove('active'));
let activeElement = document.getElementById(subname);
if (activeElement) {
    activeElement.classList.add('active');
}
function adjustFooterPosition() {
    const footer = document.getElementById("footer");
    const rect = footer.getBoundingClientRect();
    const isVisible = rect.top >= 0 && rect.bottom <= window.innerHeight;
    if (!isVisible) {
        if (window.innerHeight % 2 === 0) {
            footer.style.transform = `translateY(-${height}px)`;
        }
    } else {
        footer.style.transform = "translateY(0)";
    }
}
window.addEventListener("resize", adjustFooterPosition);
adjustFooterPosition();