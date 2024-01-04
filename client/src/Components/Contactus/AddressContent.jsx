const AddressContent = ({ colClass }) => {
  return (
    <div className="row">
      <div className={colClass}>
        <div className="contact_wrap">
          <div className="title_bar">
            <i className="fas fa-map-marker-alt"></i>
            <h4>Address</h4>
          </div>
          <div className="contact_content">
            <p>
              FF-10, Spanish Court, Bajghera Rd, Sector 2, Palam Vihar,
               <br />
               Gurugram, Haryana 122017
            </p>
          </div>
        </div>
      </div>
      <div className={colClass}>
        <div className="contact_wrap">
          <div className="title_bar">
            <i className="fas fa-envelope"></i>
            <h4>email address</h4>
          </div>
          <div className="contact_content">
            <ul>
              <li>booking@sewaktravels.com</li>
              <li>info@sewakcabs.com </li>
            </ul>
          </div>
        </div>
      </div>
      <div className={colClass}>
        <div className="contact_wrap">
          <div className="title_bar">
            <i className="fas fa-phone-alt"></i>
            <h4>phone</h4>
          </div>
          <div className="contact_content">
            <ul>
              <li>+91 837 - 782 - 8828</li>
            </ul>
          </div>
        </div>
      </div>
      <div className={colClass}>
        <div className="contact_wrap">
          <div className="title_bar">
            <i className="fas fa-fax"></i>
            <h4>fax</h4>
          </div>
          <div className="contact_content">
            <ul>
              <li>+1 212 999 8888</li>
              <li>+44 1-2222 8888</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  );
};

export default AddressContent;
