const Location = () => {
  return (
    <div className="col-xl-3 col-md-6">
      <div className="footer-title">
        <h5>{"Our Location"}</h5>
      </div>
      <div className="footer-content">
        <div className="footer-map">
          <iframe
            title="map Location"
            src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Sewak%20Travels,%20FF-10,%20Spanish%20Court,%20Bajghera%20Rd,%20Sector%202,%20Palam%20Vihar,%20Gurugram,%20Haryana%20122017+(sewak%20travels)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            allowFullScreen
          ></iframe>
        </div>
      </div>
    </div>
  );
};

export default Location;
