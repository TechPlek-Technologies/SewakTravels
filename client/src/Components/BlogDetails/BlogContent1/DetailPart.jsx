
function DetailPart({data}){
    return (
      <div className="detail-part" dangerouslySetInnerHTML={{ __html: data.description }} />
    );
  };
  
  export default DetailPart;