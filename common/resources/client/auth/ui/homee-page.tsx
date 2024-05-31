// Import yang dibutuhkan
import React from 'react';

// Komponen utama untuk menampilkan situs web eksternal
const ExternalSitePage: React.FC = () => {
  return (
    <div>
      <iframe
        src="././public/home/"
        width="100%"
        height="100 vh"
        frameBorder="0"
        style={{ width: '100%', height: '100vh', border: 'none' }}
      />
    </div>
  );
};

export default ExternalSitePage;