function Button({ btnClass, name }){
    return <button className={`btn ${btnClass} color1`} type="button">{name}</button>;
}

export default Button;