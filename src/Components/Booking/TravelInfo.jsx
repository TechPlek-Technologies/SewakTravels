import { Link } from "react-router-dom";

const TravelInfo= () => {
   
    return (
      <div className="col-lg-7">
        <div className="guest-detail">
          <h2>{"Travel Information"}</h2>
          <form onSubmit={(event)=>event.preventDefault()}>
            <div className="form-group">
              <div className="row">
                <div className="col first-name">
                  <label>{"First Name"}</label>
                  <input type="text" id="firstName" className="form-control" placeholder="First name" required={true} />
                </div>
                <div className="col">
                  <label>{"Last Name"}</label>
                  <input type="text" id="lastName" className="form-control" placeholder="Last name"  required={true} />
                </div>
              </div>
            </div>
            <div className="form-group">
              <label>{"Email Address"}</label>
              <input type="email" className="form-control" placeholder="Enter email"  required={true} />
              <small id="emailHelp" className="form-text text-muted">
                Booking confirmation will be sent to this email ID.
              </small>
            </div>
            <div className="form-group">
              <label>{"Contact Info"}</label>
              <input id="mobile-no" type="tel" className="form-control" />
            </div>
            <div className="form-group">
              <label htmlFor="exampleFormControlTextarea1">{"Special Request"}</label>
              <textarea className="form-control" id="exampleFormControlTextarea1" rows={3} placeholder="e.g.. early check-in, airport transfer"></textarea>
            </div>
            <div className="form-group">
              <label htmlFor="exampleFormControlTextarea1">have a coupon code?</label>
              <div className="input-group">
                <input type="text" className="form-control" placeholder="Promo Code" />
                <div className="input-group-prepend">
                  <span className="input-group-text">{"Apply"}</span>
                </div>
              </div>
            </div>
            <div className="submit-btn">
            <Link href="/hotel/booking/checkout"><button className="btn btn-solid" type="submit" onClick={()=>{
                alert("payment Initiated")
            }}>
                {"Book Now"}
              </button></Link>
            </div>
          </form>
        </div>
      </div>
    );
  };
  
  export default TravelInfo;
  