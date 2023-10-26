import { Link } from "react-router-dom";

const Links= () => {
    return (
      <div className="col-xl-2 col-md-3 order-cls">
        <div className="footer-space">
          <div className="footer-title">
            <h5>{"Useful Links"}</h5>
          </div>
          <div className="footer-content">
            <div className="footer-links">
              <ul>
                <li>
                  <Link href="/home/hotels/classic">Home</Link>
                </li>
                <li>
                  <Link href="/home/cab/modern">Our Vehical</Link>
                </li>
                <li>
                  <Link href="/pages/element-pages/video">Latest Video</Link>
                </li>
                <li>
                  <Link href="/pages/element-pages/service">Services</Link>
                </li>
                <li>
                  <Link href="/tour/booking/booking-page">Booking Deal</Link>
                </li>
                <li>
                  <Link href="/pages/other-pages/contact-us-1">Emergency Call</Link>
                </li>
                <li>
                  <Link href="/pages/element-pages/app">Mobile App</Link>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default Links;