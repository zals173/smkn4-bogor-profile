import './bootstrap';

document.addEventListener('DOMContentLoaded', function () {
    const sections = document.querySelectorAll('section[data-section]');
    const navLinks = document.querySelectorAll('.nav-link[data-nav]');

    if (sections.length && navLinks.length) {
        const activeClasses = ['text-gold', 'border-b-2', 'border-gold'];

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const currentId = entry.target.getAttribute('data-section');
                    navLinks.forEach((link) => {
                        if (link.dataset.nav === currentId) {
                            link.classList.add(...activeClasses);
                        } else {
                            link.classList.remove(...activeClasses);
                        }
                    });
                }
            });
        }, { rootMargin: '-45% 0px -45% 0px', threshold: 0 });

        sections.forEach((section) => observer.observe(section));
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.galeri-item');
    const lightbox = document.getElementById('lightbox');

    if (items.length && lightbox) {
        const lightboxImage = document.getElementById('lightbox-image');
        const lightboxJudul = document.getElementById('lightbox-judul');
        const lightboxKategori = document.getElementById('lightbox-kategori');
        const lightboxCounter = document.getElementById('lightbox-counter');
        let currentIndex = 0;

        const kategoriWarna = { Prestasi: 'bg-success', Kegiatan: 'bg-blue-600', Fasilitas: 'bg-gold' };

        function openLightbox(index) {
            currentIndex = index;
            const item = items[index];
            lightboxImage.src = item.dataset.gambar;
            lightboxJudul.textContent = item.dataset.judul;
            lightboxKategori.textContent = item.dataset.kategori;
            lightboxKategori.className = 'inline-block text-white text-xs font-bold px-3 py-1 rounded uppercase mb-2 ' + (kategoriWarna[item.dataset.kategori] || 'bg-navy');
            lightboxCounter.textContent = (index + 1) + ' / ' + items.length;
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
        }

        function closeLightbox() {
            lightbox.classList.add('hidden');
            lightbox.classList.remove('flex');
        }

        items.forEach((item, index) => {
            item.addEventListener('click', () => openLightbox(index));
        });

        document.getElementById('lightbox-close').addEventListener('click', closeLightbox);
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });

        document.getElementById('lightbox-next').addEventListener('click', () => {
            openLightbox((currentIndex + 1) % items.length);
        });
        document.getElementById('lightbox-prev').addEventListener('click', () => {
            openLightbox((currentIndex - 1 + items.length) % items.length);
        });

        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') openLightbox((currentIndex + 1) % items.length);
            if (e.key === 'ArrowLeft') openLightbox((currentIndex - 1 + items.length) % items.length);
        });
    }

    const muatLebihBanyak = document.getElementById('muat-lebih-banyak');
    if (muatLebihBanyak) {
        muatLebihBanyak.addEventListener('click', () => {
            document.querySelectorAll('.galeri-item.hidden').forEach((el) => el.classList.remove('hidden'));
            muatLebihBanyak.parentElement.classList.add('hidden');
        });
    }
});