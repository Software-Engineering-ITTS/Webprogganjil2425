import React from 'react';
import { Link } from 'react-router-dom';

const Navbar = () => {
  return (
    <nav className="bg-blue-600 p-4">
      <ul className="flex space-x-6">
        <li><Link to="/" className="text-white">Home</Link></li>
        <li><Link to="/dashboard" className="text-white">Dashboard</Link></li>
      </ul>
    </nav>
  );
};

export default Navbar;
