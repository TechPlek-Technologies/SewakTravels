import React from 'react'
import ReviewContentTest from './ReviewContentTest'
import CabAnimation from '../../CallService/CabAnimation';

const TestimonialTest = () => {
  return (
    <div>
       <section class="blog_section destination-section section-b-space ratio_55 animated-section">
       <CabAnimation />
        <div class="container">
            <div class="title-2">
                <h2><span>Testimonials</span></h2>
                <h2>Read from our satisfied clients</h2>
            </div>
           <ReviewContentTest/>
        </div>
    </section>
    </div>
  )
}

export default TestimonialTest;

