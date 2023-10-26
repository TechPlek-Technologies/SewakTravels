import { Link } from "react-router-dom";

const About = () => {
    return (
      <div className="col-xl-2 col-md-3">
        <div className="footer-space">
          <div className="footer-title">
            <h5>{"About"}</h5>
          </div>
          <div className="footer-content">
            <div className="footer-links">
              <ul>
                <li>
                  <Link href="/pages/other-pages/about-us-1">About us</Link>
                </li>
                <li>
                  <Link href="/pages/other-pages/faq">FAQ</Link>
                </li>
                
                
                <li>
                  <Link href="/pages/other-pages/user-dashboard">Terms & condition</Link>
                </li>
                <li>
                  <Link href="/pages/other-pages/user-dashboard">Privacy</Link>
                </li>
                <li>
                  <Link href="https://support.pixelstrap.com/">Support</Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default About;