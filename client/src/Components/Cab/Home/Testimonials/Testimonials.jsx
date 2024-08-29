import CabAnimation from "../../CallService/CabAnimation";
import ReviewContent from "./ReviewContent";

const Testimonials= () => {
    return (
      <section className="testimonial-area bg-color-of-white pt-120 testimonial-padding-bottom animated-section">
         <CabAnimation />
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-lg-9">
            <div className="section-title text-center title-anim" style={{perspective:"400px"}}><div className="testimonial1"><span>Testimonials</span></div>
            <div className="testimonial2">
              <h2>Read from our satisfied clients</h2>
              </div>
              </div>
          </div>
        </div>
        <ReviewContent/>
      </div>
    </section>
    );
  };
  
  export default Testimonials;