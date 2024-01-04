import { socialIconData } from "../../Data/CommonData";

function ContactInfo () {
    return (
      <div className="single-sidebar">
        <h6 className="contact-title">contact info</h6>
        <p className="address">
          {" "}
          <i className="fas fa-map-marker-alt"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        </p>
        <p>
          <i className="fas fa-phone-alt"></i> 123 254 121
        </p>
        <a href="#">
          <p>
            <i className="fas fa-envelope"></i> Contact@seaview.com
          </p>
        </a>
        <div className="social-box">
          <ul>
            {socialIconData.map((data) => (
              <li key={data.id}>
                <a href={data.link} target="_blank">
                  <i className={data.iconClass}></i>
                </a>
              </li>
            ))}
          </ul>
        </div>
     
      </div>
    );
  };
  
  export default ContactInfo;