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
        <section class="testimonial_section pt-0 section-b-space">
        <div class="container">
            <div class="title-1 title-5">
                <h3>Testimonials </h3>
            </div>
            <Slider {...slide1} className="slide-2 arrow-classic">
             {reviews2.map((reviews2,index) => (
            <div class="row" key={index}>
                <div class="offset-lg-1 col-lg-10">
                    <div class="slide-1 arrow-classic">
                        <div>
                            <div class="testimonial">
                                <div class="top-part">
                                    <div class="img-part">
                                        <div class="animation-circle-inverse"><i></i><i></i><i></i></div>
                                        <img src={reviews2.src} class="img-fluid lazyload"
                                            alt=""/>
                                        <i class="fas fa-heart heart-icon"><span class="effect"></span></i>
                                    </div>
                                </div>
                                <div class="bottom-part">
                                    <p>{reviews2.description}</p>
                                    <h6><strong>{reviews2.name}</strong></h6>
                                    <Rating />
                                    <div class="quote-icon">
                                        <i class="fas fa-quote-right"></i>
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
