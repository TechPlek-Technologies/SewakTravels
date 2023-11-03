import Slider from "react-slick";
import Img from "../Common/Img";
import TitleThree from "../Cab/Ourvehicle/TitleThree";
import Animation from "../Common/Animation";
import { Link } from "react-router-dom";

const OurTeamContent= () => {
    const slide3 = {
        adaptiveHeight: true,
        // centerMode: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 5000,
        // centerMode: false,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
      };
      const teamMembers = [
        { name: "Julia Holmes", role: "CEO", image: "/assets/images/inner-pages/team/1.jpg" },
        { name: "Lucas Smith", role: "marketing", image: "/assets/images/inner-pages/team/2.jpg" },
        { name: "Pablo Himenez", role: "customer service", image: "/assets/images/inner-pages/team/3.jpg" },
        { name: "Lucas Smith", role: "marketing", image: "/assets/images/inner-pages/team/2.jpg" },
      ];
    return (
      <section className="team-section animated-section section-b-space">
        <Img src="/assets/images/cab/grey-bg.jpg" alt="" className="img-fluid bg-img" />
        <Animation />
        <div className="container">
          <TitleThree classTitle={"title-1"} title="rica" subTitle={"Our Team"} />
          <div className="row">
            <div className="col">
              <Slider {...slide3} className="team-slider no-arrow">
                {teamMembers.map((member, index) => (
                  <div key={index}>
                    <div className="team-box">
                      <div className="img-part">
                        <img src={member.image} className="img-fluid" alt="" />
                      </div>
                      <div className="team-content">
                        <h3>{member.name}</h3>
                        <h6>{member.role}</h6>
                      </div>
                      <div className="team-social">
                        <Link to={"https://accounts.google.com/"} target="_blank" rel="noreferrer"  className="social-box">
                          <img src="/assets/images/icon/social/google.png" className="img-fluid" alt="" />
                        </Link>
                        <Link to={"https://twitter.com/"} target="_blank" rel="noreferrer" className="social-box">
                          <img src="/assets/images/icon/social/twitter.png" className="img-fluid" alt="" />
                        </Link>
                        <Link to={"https://www.facebook.com/"} target="_blank" rel="noreferrer" className="social-box">
                          <img src="/assets/images/icon/social/facebook.png" className="img-fluid" alt="" />
                        </Link>
                      </div>
                    </div>
                  </div>
                ))}
              </Slider>
            </div>
          </div>
        </div>
      </section>
    );
  };
  
  export default OurTeamContent;
  