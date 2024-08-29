import Slider from "react-slick";
import { reviews3 } from "./Data/Reviews";

const Testimonial = ({ side }) => {
  const slide2 = {
    infinite: true,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 586,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };
    return (
        <section className="testimonial-area bg-color-of-white pt-120 testimonial-padding-bottom">
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
					<div>
          <Slider {...slide2} className="slide-2 arrow-classic">
                    {reviews3.map((reviews3,index) => (
                      <div className="testimonial-box text-center col-lg-10" key={index}>
											<div className="testimonial-info-wrap">
												<div className="testimonial-quote d-inline-block">
													<img src="/assets/img/testimonials/quote.svg" alt="" style={{height:"45px",width:"45px"}}/>
												</div>
                        <img className="testimonial-author-img" src={reviews3.src} alt=""/>
												<p>{reviews3.description}</p>
												<h3><strong>{reviews3.name}</strong></h3>
											</div>
										</div>
                       ))}
                    </Slider>
                    </div>
				</div>
			</section>
    );
};

export default Testimonial;
