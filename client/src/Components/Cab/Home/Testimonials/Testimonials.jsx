import Animation from "../../../Common/Animation";
import TitleComponent from "../../../Common/TitleComponent";
import ReviewContent from "./ReviewContent";

const Testimonials= () => {
    return (
      <section className="testimonial-section  animated-section">
        <Animation />
        <div class="title-1 detail-title">
                <h2 class="pt-0">Testimonials</h2>
            </div>
        <div className="container">
          <TitleComponent title={"Our"} subTitle={""} span={"Testimonials"} titleClass={"title-3 our-Testimonial"} />
         
          <div className="slide-1">
            <ReviewContent />
          </div>
        </div>
      </section>
    );
  };
  
  export default Testimonials;