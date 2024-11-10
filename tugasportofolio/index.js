// Fungsi untuk mengarahkan ke setiap bagian saat item navbar di-klik
document.addEventListener('DOMContentLoaded', () => {
    
    function cvpandu(){
        const cvUrl = 'Pandu_cv.pdf';
        const link = document.createElement('a');
        link.href = cvUrl;
        link.download = 'Pandu_cv.pdf';
        link.click();
    }
});