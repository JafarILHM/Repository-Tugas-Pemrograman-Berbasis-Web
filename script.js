// Kode untuk fungsionalitas menu mobile
const mobileToggle = document.getElementById('mobileToggle');
const navMenu = document.getElementById('navMenu');

mobileToggle.addEventListener('click', () => {
navMenu.classList.toggle('active');
});

// Pilih semua elemen section yang memiliki ID
const sections = document.querySelectorAll('section[id]');

// Pilih semua link navigasi di dalam menu
const navLinks = document.querySelectorAll('.nav-menu a');

// Fungsi untuk menangani perubahan status aktif
function navHighlighter() {
// Dapatkan posisi scroll vertikal saat ini
let scrollY = window.pageYOffset;

// Looping melalui setiap section untuk memeriksa mana yang sedang terlihat
sections.forEach(current => {
    const sectionHeight = current.offsetHeight;
    const sectionTop = current.offsetTop - 50; 
    let sectionId = current.getAttribute('id');
    
    if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
    document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.add('active');
    } else {
    document.querySelector('.nav-menu a[href*=' + sectionId + ']').classList.remove('active');
    }
});
}

// Tambahkan event listener untuk event 'scroll'
window.addEventListener('scroll', navHighlighter);

// Panggil fungsi sekali saat halaman dimuat untuk mengatur state awal
navHighlighter();