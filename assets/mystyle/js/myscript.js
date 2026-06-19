/**
 * Created by Anwarsyah on 04/09/2025.
 */
// ini bagian switch dark light
// Theme Switcher
const themeToggle = document.getElementById("themeToggle");

const currentTheme =
    localStorage.getItem("theme") || "light";

document.documentElement.setAttribute(
    "data-bs-theme",
    currentTheme
);

updateThemeIcon(currentTheme);

themeToggle.addEventListener("click", () => {

    const theme =
        document.documentElement.getAttribute(
            "data-bs-theme"
        );

const newTheme =
    theme === "light"
        ? "dark"
        : "light";

document.documentElement.setAttribute(
    "data-bs-theme",
    newTheme
);

localStorage.setItem(
    "theme",
    newTheme
);

updateThemeIcon(newTheme);
});

function updateThemeIcon(theme)
{
    themeToggle.innerHTML =
        theme === "dark"
            ? '<i class="bi bi-sun"></i>'
            : '<i class="bi bi-moon"></i>';
}

// ini untuk dropdown user kanan atas
document.querySelectorAll('.dropdown').forEach(function (el) {
    const menu = el.querySelector('.dropdown-menu');

    // Saat dropdown mau ditutup
    el.addEventListener('hide.bs.dropdown', function (e) {
        e.preventDefault(); // cegah bootstrap langsung hide
        menu.classList.add('closing');

        setTimeout(() => {
            menu.classList.remove('closing');
        el.classList.remove('show');     // manual cabut class parent
        menu.classList.remove('show');   // manual cabut class menu
    }, 250); // sesuai durasi transition
    });
});


// ini untuk sroll top top
const btn = document.getElementById("btnBackToTop");

window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
    btn.classList.add("show");
} else {
    btn.classList.remove("show");
}
});

btn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});