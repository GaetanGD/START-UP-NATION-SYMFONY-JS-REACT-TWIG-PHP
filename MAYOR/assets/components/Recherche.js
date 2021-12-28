import React, { useState, useCallback, useEffect, useRef } from "react";

const Recherche = () => {

    const [query, setQuery] = useState("");
    const [results, setResult] = useState([]);
    const [loading, setLoading] = useState(false);
    let detectTime = useRef();

    const CallDoctrine = useCallback(() => {
        fetch(`/travel/search/${query}`)
            .then((response) => response.json())
            .then((data) => {
                setResult(data);
                setLoading(false);
            });
    }, [query]);

    useEffect(() => {
        if (query.length > 0){
            setLoading(true);
            clearTimeout(detectTime.current);
            detectTime.current = setTimeout(() =>{
                CallDoctrine();
            },1000);
        }
    }, [query, CallDoctrine]);

    const textChange = (e) => {
        setQuery(e.target.value);
    };
    return(
        <>
            {/* <form> */}
                <input class="form-control" type="text" onChange={textChange} value={query} placeholder="&ensp;Recherche" aria-label="Search"/>
                <button class="search_button"><img src="/style/images/search.svg"/></button>
            {/* </form>
            <input type="text" onChange={textChange} value={query}/> */}
            {results.length > 0 ? (
                <ul>
                    {results.map((travel)=> {
                        return (
                            <li key={travel.id}>
                                <a href={`/travel/${travel.id}`}>{travel.name}</a>
                            </li>
                        );
                    })}
                </ul>
            ) : query.length > 0 && !loading ? (
                <div>Aucun résultat</div>
            ) : (
                !loading && <div>Effectuer une recherche</div>
            )}
        </>
    )
}

export default Recherche;