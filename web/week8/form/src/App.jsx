import { useState } from 'react';
import reactLogo from './assets/react.svg';
import viteLogo from '/vite.svg';
import './App.css';

function App() {
  const [count, setCount] = useState(0);

  return (
    <>
      <header>
        <div className="container-header">
          <h1>Sistem Manajemen Pelanggan (CRM)</h1>
        </div>
      </header>
      <main>
        <div className="container-form">
          <label htmlFor="first-name">First Name</label>
          <input type="text" id="first-name" className="form-input" />

          <label htmlFor="last-name">Last Name</label>
          <input type="text" id="last-name" className="form-input" />

          <label htmlFor="address">Address</label>
          <input type="text" id="address" className="form-input" />

          <label htmlFor="email">Email</label>
          <input type="email" id="email" className="form-input" />

          <label htmlFor="password">Password</label>
          <input type="password" id="password" className="form-input" />

          <label htmlFor="credit-card">Credit Card</label>
          <input type="number" id="credit-card" className="form-input-number" />

          <p>Choose your gender:</p>
          <input type="radio" name="gender" id="male" />
          <label htmlFor="male">Male</label>
          <input type="radio" name="gender" id="female" />
          <label htmlFor="female">Female</label>

          <p>Preferensi Pembelian Anda:</p>
          <input type="checkbox" id="laptop" />
          <label htmlFor="laptop">Laptop</label>
          <input type="checkbox" id="pc" />
          <label htmlFor="pc">PC</label>
          <input type="checkbox" id="mobilephone" />
          <label htmlFor="mobilephone">Mobile Phone</label>
          <input type="checkbox" id="running-shoes" />
          <label htmlFor="running-shoes">Running Shoes</label>
          <input type="checkbox" id="bicycle" />
          <label htmlFor="bicycle">Bicycle</label>

          <label htmlFor="laptop">Choose your laptop:</label>
          <select id="laptop">
            <option value="thinkpad-x250">Thinkpad X250</option>
            <option value="thinkpad-t480">Thinkpad T480</option>
            <option value="thinkpad-x1-carbon">Thinkpad X1 Carbon</option>
            <option value="thinkpad-x280">Thinkpad X280</option>
            <option value="old-thinkpad">Old Thinkpad</option>
          </select>

          <label htmlFor="textarea">Give me your feedback:</label>
          <textarea id="textarea" className="form-textarea"></textarea>

          <div className="container-submit">
            <button type="submit" className="form-submit">Submit</button>
          </div>
        </div>
      </main>
      <footer>
        <div className="container-footer">
          <p><strong>@iamjustzero</strong></p>
        </div>
      </footer>
    </>
  );
}

export default App;
