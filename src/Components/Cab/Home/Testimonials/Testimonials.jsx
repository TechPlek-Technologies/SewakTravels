import Animation from "../../../Common/Animation";
import TitleComponent from "../../../Common/TitleComponent";
import ReviewContent from "./ReviewContent";

const Testimonials= () => {
    return (
      <section className="testimonial-section  animated-section">
        <Animation />
        <div className="container">
          <TitleComponent title={"Our"} subTitle={"Our Happy Customer"} span={"Customer"} titleClass={"title-3"} />
          <div className="slide-1">
            <ReviewContent />
          </div>
        </div>
      </section>
    );
  };
  
  export default Testimonials;