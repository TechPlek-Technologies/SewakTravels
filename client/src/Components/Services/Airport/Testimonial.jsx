import Slider from "react-slick";
import { reviews2 } from "./Data/Reviews";
import Rating from "../../Cab/Home/Testimonials/Rating";

const Testimonial = ({ side }) => {
    const slide1 = {
        slidesToShow: 2,
        slidesToScroll: 1,
        fade: true,
      };
    return (
        <section className="testimonial_section pt-0 section-b-space">
        <div className="container">
            <div className="title-1 title-5">
                <h3>Testimonials </h3>
            </div>
            <Slider {...slide1} className="slide-2 arrow-classic">
             {reviews2.map((reviews2,index) => (
            <div className="row" key={index}>
                <div className="offset-lg-1 col-lg-10">
                    <div className="slide-1 arrow-classic">
                        <div>
                            <div className="testimonial">
                                <div className="top-part">
                                    <div className="img-part">
                                        <div className="animation-circle-inverse"><i></i><i></i><i></i></div>
                                        <img src={reviews2.src} className="img-fluid lazyload"
                                            alt=""/>
                                        <i className="fas fa-heart heart-icon"><span className="effect"></span></i>
                                    </div>
                                </div>
                                <div className="bottom-part">
                                    <p>{reviews2.description}</p>
                                    <h6><strong>{reviews2.name}</strong></h6>
                                    <Rating />
                                    <div className="quote-icon">
                                        <i className="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             ))}
             </Slider>
        </div>
    </section>
    );
};

export default Testimonial;
