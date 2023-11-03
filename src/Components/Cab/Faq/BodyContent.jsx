const BodyContent= ({ tabId ,content}) => {
  return (
    <div>
      <div className="card-title">{tabId}</div>
      {content?.map((content,index)=>(
        <div className="card" key={index}>
        <div className="card-header">
          <h5>{content.heading}</h5>
        </div>
        <div className="card-body">
          {content.content}
        </div>
      </div>
      ))}
      
    </div>
  );
  };
  
  export default BodyContent;