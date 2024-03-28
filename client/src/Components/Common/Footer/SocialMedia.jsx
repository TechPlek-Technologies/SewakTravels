// import { FaXTwitter,FaFacebookF,FaInstagram,FaLinkedin } from "react-icons/fa6";

const SocialMedia= () => {
    return (
      <ul>
        <li>
          <a href="https://www.facebook.com/sewak.travels.service" target="_blank" rel="noreferrer">
            <i className="fab fa-facebook-f"></i>
            {/* <FaFacebookF style={{height:"auto",width:"20px",color:"#717171"}}/> */}
          </a>
        </li>
        <li>
          <a href="https://www.instagram.com/sewaktravelsservice/" target="_blank" rel="noreferrer">
            <i className="fab fa-instagram"></i>
            {/* <FaInstagram style={{height:"auto",width:"20px",color:"#717171"}}/> */}
          </a>
        </li>
        <li>
          <a href="https://twitter.com/SewakTravels" target="_blank" rel="noreferrer">
            <i className="fab fa-twitter"></i>
            {/* <FaXTwitter style={{height:"auto",width:"20px",color:"#717171"}}/> */}
          </a>
        </li>
        <li>
          <a href="https://www.linkedin.com/in/sewak-travels-629788268/" target="_blank" rel="noreferrer">
            <i className="fab fa-linkedin"></i>
            {/* <FaLinkedin style={{height:"auto",width:"20px",color:"#717171"}}/> */}
          </a>
        </li>
      </ul>
    );
  };
  
  export default SocialMedia;