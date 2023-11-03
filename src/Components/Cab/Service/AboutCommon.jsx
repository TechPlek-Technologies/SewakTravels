const AboutCommon= ({ aboutData }) => {
  
    return (
      <>
        {aboutData.map((data,index) => (
          <div className="col-xl-3 col-6" key={index}>
            <div className="highlight-box wow fadeInUp">
              <div>{data.svg}</div>
              <div className="content-sec">
                <h5>{data.title}</h5>
                <p>{data.desc}</p>
              </div>
            </div>
          </div>
        ))}
      </>
    );
  };
  
  export default AboutCommon;