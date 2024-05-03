import CabAnimation from "../../CallService/CabAnimation";
import ReviewContent from "./ReviewContent";

const Testimonials= () => {
    return (
      <section class="testimonial-area bg-color-of-white pt-120 testimonial-padding-bottom animated-section">
         <CabAnimation />
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <div class="section-title text-center title-anim" style={{perspective:"400px"}}><div className="testimonial1"><span>Testimonials</span></div>
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