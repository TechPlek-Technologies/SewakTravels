const AboutCommon= ({ aboutData }) => {
  
    return (
      <>
        {aboutData.map((data,index) => (
          <div className="col-xl-4 col-4" key={index}>
            <div className="highlight-box wow fadeInUp">
              <div><img src={data.img} /></div>
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