import React, { useState } from "react";
import CabAnimation from "../CallService/CabAnimation";

const DelhiToDestination = ({ data }) => {

    console.log(data)
    return (
        <section class="single-section animated-section  bg-inner">
            <CabAnimation />

            <div class="container">
                <div className="title-1 detail-title">
                    <h2>{data?.main}</h2>
                </div>
                <div class="row">
                    <div class="col-xl-16 col-lg-16">
                        <div class="description-section tab-section">
                            <div class="description-details">
                                <div class="desc-box">
                                    <div class="about menu-part" id="policy">
                                        <div class="about-sec">
                                            <h3 className="service-h3"> {data?.sub} </h3>
                                            <p> {data?.subcontent}</p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub1}</h3>
                                            <p>{data?.sub1content} </p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub2}</h3>
                                            <p>{data?.sub2content}</p>
                                            <h3 className="service-h3">{data?.sub3}</h3>
                                            <p>{data?.sub3content}</p>

                                            <h3 className="service-h3">{data?.sub4}</h3>
                                            <p>{data?.sub4content}</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="desc-box" >
                                    <img className="bimg" src="/assets/img/Locations/chandigarh.webp" />
                                </div>
                                <div class="desc-box mt-5">

                                    <div class="about menu-part" id="policy">
                                        <h3 className="service-h3">{data?.sub5}</h3>
                                        <p>{data?.sub5content}</p>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub6}</h3>
                                            <p>{data?.sub6content}</p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub7}</h3>
                                            <p>{data?.sub7content}</p>
                                        </div>

                                    </div>
                                </div>

                                <div className="title-1 detail-title">
                                    <h2>{data?.sub8}</h2>
                                </div>

                                <div class="desc-box">

                                    <div class="about menu-part" id="policy">
                                        {/* <h3 className="service-h3">{data?.sub8content?.p1}</h3> */}
                                        <p>{data?.sub8content?.p1}</p>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub8content?.h1}</h3>
                                            <p>{data?.sub8content?.h1content}</p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub8content?.h2}</h3>
                                            <p>{data?.sub8content?.h2content}</p>
                                        </div>

                                    </div>
                                </div>

                                {/* ###### content 9 ##### */}

                                <div className="title-1 detail-title">
                                    <h2>{data?.sub9}</h2>
                                </div>
                                <div class="desc-box">

                                    <div class="about menu-part" id="policy">
                                         <h3 className="service-h3">{data?.sub9content?.h3}</h3> 
                                        <p>{data?.sub9content?.h3content}</p>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub9content?.h4}</h3>
                                            <p>{data?.sub9content?.h4content}</p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3"></h3>
                                            <p>{data?.sub9content?.p2}</p>
                                        </div>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.sub10}</h3>
                                            <p>{data?.sub10content?.p3}</p>
                                            <p>{data?.sub10content?.p4}</p>
                                            <h3 className="service-h3"></h3>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                {/* ########## faq content####  */}

                                <div className="title-1 detail-title">
                                    <h2>{data?.faqhead}</h2>
                                </div>
                                <div class="desc-box">

                                    <div class="about menu-part" id="policy">
                                         <h3 className="service-h3">{data?.faqcontent?.q1}</h3> 
                                        <p>{data?.faqcontent?.a1}</p>
                                        <div class="about-sec">
                                            <h3 className="service-h3">{data?.faqcontent?.q2}</h3>
                                            <p>{data?.faqcontent?.a2}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q3}</h3>
                                            <p>{data?.faqcontent?.a3}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q4}</h3>
                                            <p>{data?.faqcontent?.a4}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q5}</h3>
                                            <p>{data?.faqcontent?.a5}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q6}</h3>
                                            <p>{data?.faqcontent?.a6}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q7}</h3>
                                            <p>{data?.faqcontent?.a7}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q8}</h3>
                                            <p>{data?.faqcontent?.a8}</p>
                                        </div>
                                        <div class="about-sec">
                                        <h3 className="service-h3">{data?.faqcontent?.q9}</h3>
                                            <p>{data?.faqcontent?.a9}</p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    )
}
export default DelhiToDestination;