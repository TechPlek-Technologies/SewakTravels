import { useState } from "react";
import { SendMail } from "../../Utility/SendMail";

const ContactForm= () => {

  const [contactFormInfo, setContactFormInfo] = useState({
    firstName: '',
    lastName: '',
    phoneNumber: '',
    email: '',
    message: ''
  });

  const handleChange = (e) => {
    const { id, value } = e.target;
    setContactFormInfo(prevState => ({
      ...prevState,
      [id]: value
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    // Handle form submission here
    console.log(contactFormInfo); // You can see the updated state here
    sendQueryEmail();
  };

  async function sendQueryEmail() {
   const res= await SendMail(
      "deepaksharmaa.39@gmail.com",
      "Contact Form",
      `<h1>New Query From Contact Form</h1> 
      <h4>Contact :${contactFormInfo.phoneNumber}</h4>
      <h4>Name :${contactFormInfo.firstName} ${" "}${contactFormInfo.lastName}</h4>
      <h4>Email :${contactFormInfo.email}</h4>
      <h4>Message :${contactFormInfo.message}</h4>`,
      "Contact Form Query"
    );

   
    if(res.status===200){
      alert(" Message Sent Successfully")
    }
  }
    return (
      <form onSubmit={handleSubmit}>
      <div className="row">
        <div className="form-group col-md-6">
          <input type="text" className="form-control" id="firstName" placeholder="First Name" required={true} onChange={handleChange} />
        </div>
        <div className="form-group col-md-6">
          <input type="text" className="form-control" id="lastName" placeholder="Last Name" required={true} onChange={handleChange} />
        </div>
        <div className="form-group col-lg-6">
          <input type="tel" className="form-control" id="phoneNumber" placeholder="Phone Number" required={true} onChange={handleChange} />
        </div>
        <div className="form-group col-lg-6">
          <input type="email" className="form-control" id="email" placeholder="Email Address" required={true} onChange={handleChange} />
        </div>
        <div className="form-group col-md-12">
          <textarea className="form-control" placeholder="Write Your Message" id="message" rows={6} required={true} onChange={handleChange}></textarea>
        </div>
        <div className="col-md-12 submit-btn">
          <button className="btn btn-solid" type="submit">
            Send Your Message
          </button>
        </div>
      </div>
    </form>
    );
  };
  
  export default ContactForm;