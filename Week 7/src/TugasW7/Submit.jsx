import { useState } from 'react';
import './Submit.css'; 

function Submit() {
    return (
        <div className="ltr">
            <h1 className="h1">Terima Kasih Telah Menggunakan Layanan PekkaMed</h1>
            <h2 className="h2">Konsultasi Anda Akan Dibalas Secepatnya</h2>
            <h2 className="h2-2">
                *Jika Memilih Antrian Emergency, Silahkan Hubungi Kami Untuk Penanganan Lebih Cepat*
            </h2>
            <div className="wa-me">
                <a href="https://wa.me/6285606782174" target="_blank" rel="noopener noreferrer">
                    <img src="ft.whatsapp.png" alt="Whatsapp" />
                </a>
            </div>
        </div>
    );
}

export default Submit;
