const Contact = () => {
  return (
    <div className="col-xl-3 col-md-6 order-cls">
      <div className="footer-title mobile-title">
        <h5>{"Contact Us"}</h5>
      </div>
      <div className="footer-content">
        <div className="contact-detail">
          <div className="footer-logo">
            <a href="/">
              <img
                src="/assets/img/footerLogo.png"
                alt=""
                className="img-fluid"
                width={139}
                height={53}
              />
            </a>
          </div>
          <p>
            SewakTravels.com is an Integrated Travel company with the objective
            of servicing all Travel verticals through its unmatched spread at
            most economical price.
          </p>
          <ul className="contact-list">
            <li>
              <i className="fas fa-map-marker-alt"></i> FF-10, Spanish Court,
              Bajghera Rd, Sector 2, Palam Vihar, Gurugram, Haryana 122017
            </li>
            <li>
              <i className="fas fa-phone-alt"></i>+91-837-782-8828
            </li>
            <li>
              <i className="fas fa-envelope"></i> booking@sewaktravels.com
            </li>
          </ul>
        </div>
      </div>
    </div>
  );
};

export default Contact;
