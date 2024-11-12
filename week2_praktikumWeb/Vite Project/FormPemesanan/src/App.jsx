import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [count, setCount] = useState(0)

  return (
    <>
      <div>
        <a href="https://vite.dev" target="_blank">
          <img src={viteLogo} className="logo" alt="Vite logo" />
        </a>
        <a href="https://react.dev" target="_blank">
          <img src={reactLogo} className="logo react" alt="React logo" />
        </a>
      </div>
      <h1>Vite + React</h1>
      
      

      {/* Form layanan hotel dengan berbagai jenis input */}
      <div className="form-container">
        <h2>Hotel Service Request Form</h2>
        <form>
          <div className="form-group">
            <label htmlFor="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required />
          </div>

          <div className="form-group">
            <label htmlFor="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
          </div>

          <div className="form-group">
            <label htmlFor="room">Room Number</label>
            <input type="number" id="room" name="room" placeholder="Enter your room number" required />
          </div>

          <div className="form-group2">
            <label>Room Service</label>
            <div>
              <input type="radio" id="cleaning" name="serviceType" value="cleaning" required />
              <label htmlFor="cleaning">Cleaning</label>
            </div>
            <div>
              <input type="radio" id="delivery" name="serviceType" value="delivery" required />
              <label htmlFor="delivery">Food Delivery</label>
            </div>
          </div>

          <div className="form-group2">
            <label>Additional Services</label>
            <div>

              <input type="checkbox" id="laundry" name="extraService" value="laundry" />
              <label htmlFor="laundry">Laundry</label>
            </div>
            <div>
              <input type="checkbox" id="taxi" name="extraService" value="taxi" />
              <label htmlFor="taxi">Taxi Booking</label>
            </div>
          </div>

          <div className="form-group">
            <label htmlFor="notes">Additional Notes</label>
            <textarea id="notes" name="notes" placeholder="Any special requests or instructions" />
          </div>

          <div className="form-group2">
            <button type="button" className="secondary-btn">Help</button>
            <button type="submit" className="submit-btn">Submit Request</button>
          </div>
        </form>
      </div>
    </>
  )
}

export default App
