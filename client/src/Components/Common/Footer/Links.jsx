import { Link } from "react-router-dom";

const Links= () => {
  const scrollToTop = () => {
    window.scrollTo(0, 0);
  };
    return (
      <div className="col-xl-3 col-md-3 order-cls">
        <div className="footer-space">
          <div className="footer-title">
            <h5>{"Useful Links"}</h5>
          </div>
          <div className="footer-content">
            <div className="footer-links">
              <ul>
                <li>
                  <Link onClick={scrollToTop} to="/">Home</Link>
                </li>
                <li>
                <Link onClick={scrollToTop} to="/service/">Cab Services</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to="/outstation-cab-taxi-service">Outstation Services</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to="/airport-cab-taxi-transport-service">Airport Services</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to="/employee-cab-taxi-transport-service">Corporate Services</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to="/intercity-cab-taxi-service">Intercity Taxi Services</Link>
                </li>
                <li>
                  <Link onClick={scrollToTop} to="/contact">Emergency Call</Link>
                </li>
                {/* <li>
                  <Link href="/pages/element-pages/app">Mobile App</Link>
                </li> */}
              </ul>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default Links;