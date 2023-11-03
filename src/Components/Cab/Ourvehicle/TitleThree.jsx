const TitleThree= ({ title, subTitle, desc, classTitle, span, pClass, h2Class }) => {
    return (
      <div className={classTitle}>
        {title && <span className="title-label">{title}</span>}
        <h2 >
          {subTitle} {span && <span>{span}</span>}
        </h2>
        <p className={pClass && pClass}>{desc}</p>
      </div>
    );
  };
  
  export default TitleThree;