const TitleComponent = ({ title, subTitle, titleClass, span, h2Class }) => {
    return (
      <div className={titleClass}>
        {/* <span className="title-label">{title}</span> */}
        <h2 className={`${h2Class && h2Class}`}>
          {subTitle}
          {span && <span>{span}</span>}
        </h2>
      </div>
    );
  };
  
  export default TitleComponent;