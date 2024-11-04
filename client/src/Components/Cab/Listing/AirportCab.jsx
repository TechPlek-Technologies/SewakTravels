import React from "react";
import CabAnimation from "../CallService/CabAnimation";

const OtherTaxi = ({ data }) => {
  return (
    <section className="single-section animated-section bg-inner">
      <CabAnimation />

      <div className="container">
        <div>
          <div className="col-xl-16 col-lg-16">
          <div
              className="title-1 detail-title h1Header"
              h1
              _ngcontent-taw-c63=""
            >
              <h1 className="page-h1-new">{data.pageTitle}</h1>{" "}
            </div>

            <div className="description-section tab-section">
              <div className="description-details">
                <div className="desc-box">
                  <div className="about menu-part" id="policy">
                    <div className="about-sec">
                      <h2 className="service-h2">{data.mainHeading}</h2>
                      <p>{data.subHeading}</p>
                      <p>{data.airportInfo}</p>
                      <p>{data.serviceInfo}</p>
                    </div>

                    <div className="about-sec">
                      <h2 className="service-h2">{data.distanceHeading}</h2>
                      <p>{data.distanceInfo}</p>
                    </div>

                    <div className="about-sec">
                      <h2 className="service-h2">{data.bookingHeading}</h2>
                      <p>{data.bookingInfo}</p>
                    </div>
                  </div>
                </div>

                {/* <div className="desc-box">
                  <img
                    className="img-fluid"
                    src={data.img}
                    alt="destination"
                    loading="lazy"
                  />
                </div> */}

                <div className="desc-box mt-md-4">
                  <div className="about menu-part" id="policy">
                    <div className="about-sec">
                      <h2 className="service-h2">{data.whyChooseHeading}</h2>
                      <p>
                        <b>{data.whyChooseSubHeading}</b>
                      </p>
                      {data.whyChooseInfo.map((item, index) => (
                        <p key={index}>
                          <b>{item.title}</b> {item.detail}
                        </p>
                      ))}
                    </div>

                    <div className="about-sec">
                      <h2 className="service-h2">{data.howToBookHeading}</h2>
                      <p>{data.howToBookInfo}</p>
                    </div>
                  </div>
                </div>

                <div className="title-1 detail-title">
                  <h2>{data.taxiServicesHeading}</h2>
                </div>

                <div className="desc-box">
                  <div className="about menu-part" id="policy">
                    {data.taxiServices.map((service, index) => (
                      <div key={index} className="about-sec">
                        <p>
                          <b>{service.title}</b>
                          {service.description}
                        </p>
                      </div>
                    ))}

                    <div className="about-sec">
                      <h2 className="service-h2">Key Highlights:</h2>
                    </div>
                    {data.highlights.map((service, index) => (
                      <div key={index} className="about-sec">
                        <p>
                          <b>{service.title}</b>
                          {service.detail}
                        </p>
                      </div>
                    ))}

                    <div className="detail-title">
                      <h3>
                        <b>{data.easyBookingHeading}</b>
                      </h3>

                      <div className="desc-box">
                        <p>{data.easyBookingInfo}</p>
                        {data.easyBookingPoints.map((points, index) => (
                          <p key={index}>{points}</p>
                        ))}
                        <p>{data.bookingCallToAction}</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="desc-box mt-md-4">
                  <div className="title-1 detail-title">
                    <h2>{data.thingsToKnowHeading}</h2>
                  </div>
                  <div className="about-sec">
                    <div className="about menu-part" id="policy">
                      <p>{data.thingsToKnowInfo}</p>
                    </div>
                  </div>
                </div>

                <div className="title-1 detail-title">
                  <h2>{data.faqHeading}</h2>
                </div>

                <div className="desc-box">
                  <div className="about menu-part" id="policy">
                    {data.faqs.map((faq, index) => (
                      <div key={index} className="about-sec">
                        <h3 className="service-h3">{faq.question}</h3>
                        <p>{faq.answer}</p>
                      </div>
                    ))}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default OtherTaxi;
