// /scores/_game_id_    (ou token)
const scores = {
    game: game_id,
    course: game_id,
    scores: [
        {
            user: user_id,
            holes: [
                {
                    id: hole_id,
                    number: hole_number,
                    score: hole_score,
                },
            ],
        }
    ]
};


// /holes/_id_
const hole = {
    id: id,
    number: hole_number,
    best: int,
    worse: int,
    average: float,
    median: float,
    count: int, // nombre de fois que le trou a ete joue
    course: id,
    minigolf: id,
}

// /games/_id_
