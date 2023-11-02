import { useRef } from "react";
import Button from "../Common/Button";
import { useState } from "react";


function GuestDetailPage() {
  const firstNameRef=useRef(null);
  const lastNameRef=useRef();
  const emailRef=useRef();
  const contactRef=useRef();

  const [isValid, setIsValid] = useState(false);

  const handleButtonClick = () => {
    // Validation logic for GuestDetailPage
    const missingFields = [];

    if (!firstNameRef.current || !firstNameRef.current.value) {
      missingFields.push(firstNameRef);
    }

    if (!lastNameRef.current || !lastNameRef.current.value) {
      missingFields.push(lastNameRef);
    }

    if (!emailRef.current || !emailRef.current.value) {
      missingFields.push(emailRef);
    }

    if (!contactRef.current || !contactRef.current.value) {
      missingFields.push(contactRef);
    }
    // You can add similar checks for other fields (lastName, email, contact)

    if (missingFields.length > 0) {
      setIsValid(true);

      // Focus on the first missing field
      missingFields[0].current.focus();

      return;
    }



    // Continue with the action (e.g., submit the form)
  };
  return (
    <div className="guest-detail">
      <form onSubmit={(event)=>event.preventDefault()}>
        <div className="form-group">
          <div className="row">
            <div className="col first-name">
              <label>first name</label>
              <input type="text" id="firstName" ref={firstNameRef} className="form-control" placeholder="First name" />
              {isValid && <div style={{"color":"red"}}>Required field.</div>}
            </div>
            <div className="col">
              <label>last name</label>
              <input type="text" id="lastName" ref={lastNameRef} className="form-control" placeholder="Last name" />
              {isValid && <div style={{"color":"red"}}>Required field.</div>}

            </div>
          </div>
        </div>
        <div className="form-group">
          <label>Email address</label>
          <input type="email" className="form-control" ref={emailRef} placeholder="Enter email" />
          {isValid && <div style={{"color":"red"}}>Required field.</div>}

          <small id="emailHelp" className="form-text text-muted">
            Booking confirmation will be sent to this email ID.
          </small>
        </div>
        <div className="form-group">

          <label>contact info</label>

          <input id="mobile-no" type="number" ref={contactRef} className="form-control" />
          {isValid && <div style={{"color":"red"}}>Required field.</div>}
        </div>
        <div className="form-group">
          <label htmlFor="exampleFormControlTextarea1">special request</label>
          <textarea className="form-control" id="exampleFormControlTextarea1" rows={3} placeholder=""></textarea>
        </div>
        <div className="form-group">
          <label htmlFor="exampleFormControlTextarea1">have a coupon code?</label>
          <div className="input-group">
            <input type="text" className="form-control" placeholder="Promo Code" />
            <div className="input-group-prepend" />
            <span className="input-group-text">apply</span>
          </div>
        </div>
        <div className="submit-btn">
          <Button isValid={isValid}  handleButtonClick={handleButtonClick} name="Proceed to pay" btnClass="btn btn-solid" />
        </div>
      </form>
    </div>
  );
};

export default GuestDetailPage;
