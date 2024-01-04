import AddressContent from "./AddressContent";
import ContactForm from "./ContactForm";
import GoogleMapComponent from "./GoogleMapComponent";

const ContactusContent= () => {
    return (
      <>
        <section className="contact_section small-section pb-0">
          <div className="container">
            <div className="row">
              <AddressContent colClass="col-lg-3 col-sm-6" />
            </div>
          </div>
        </section>
        <section className="small-section">
          <div className="container">
            <div className="row">
              <div className="col-md-6">
                <div className="get-in-touch">
                  <h3>{"Get In Touch"}</h3>
                  <ContactForm />
                </div>
              </div>
              <div className="col-md-6">
                <div className="contact-map">
                  <GoogleMapComponent />
                </div>
              </div>
            </div>
          </div>
        </section>
      </>
    );
  };
  export default ContactusContent;
  